// offline-sync.js

// Check if the browser supports IndexedDB
if (!('indexedDB' in window)) {
    console.log('This browser doesn\'t support IndexedDB');
    return;
}

let db;

// Open (or create) the database
const dbPromise = indexedDB.open('FormDatabase', 1);

dbPromise.onerror = function(event) {
    console.log('Error opening database:', event.target.error);
};

dbPromise.onsuccess = function(event) {
    db = event.target.result;
    console.log('Database opened successfully');
};

dbPromise.onupgradeneeded = function(event) {
    db = event.target.result;
    const objectStore = db.createObjectStore('formData', { autoIncrement: true });
    console.log('Object store created');
};

// Function to save form data
function saveFormData(formData) {
    return new Promise((resolve, reject) => {
        const transaction = db.transaction(['formData'], 'readwrite');
        const objectStore = transaction.objectStore('formData');
        const request = objectStore.add(formData);

        request.onerror = function(event) {
            reject('Error saving form data:', event.target.error);
        };

        request.onsuccess = function(event) {
            resolve('Form data saved successfully');
        };
    });
}

// Function to retrieve all stored form data
function getAllFormData() {
    return new Promise((resolve, reject) => {
        const transaction = db.transaction(['formData'], 'readonly');
        const objectStore = transaction.objectStore('formData');
        const request = objectStore.getAll();

        request.onerror = function(event) {
            reject('Error retrieving form data:', event.target.error);
        };

        request.onsuccess = function(event) {
            resolve(event.target.result);
        };
    });
}

// Function to delete a form data entry
function deleteFormData(id) {
    return new Promise((resolve, reject) => {
        const transaction = db.transaction(['formData'], 'readwrite');
        const objectStore = transaction.objectStore('formData');
        const request = objectStore.delete(id);

        request.onerror = function(event) {
            reject('Error deleting form data:', event.target.error);
        };

        request.onsuccess = function(event) {
            resolve('Form data deleted successfully');
        };
    });
}

// Function to sync data with the server
async function syncWithServer() {
    const formDataList = await getAllFormData();
    for (const formData of formDataList) {
        try {
            const response = await fetch('your_server_endpoint.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            });

            if (response.ok) {
                await deleteFormData(formData.id);
                console.log('Data synced successfully');
            } else {
                console.log('Failed to sync data');
            }
        } catch (error) {
            console.log('Error syncing data:', error);
        }
    }
}

// Event listener for form submission
document.querySelector('form').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    const formDataObject = Object.fromEntries(formData);

    try {
        if (navigator.onLine) {
            // If online, submit directly to the server
            const response = await fetch('your_server_endpoint.php', {
                method: 'POST',
                body: formData,
            });

            if (response.ok) {
                console.log('Form submitted successfully');
            } else {
                throw new Error('Failed to submit form');
            }
        } else {
            // If offline, save to IndexedDB
            await saveFormData(formDataObject);
            console.log('Form data saved locally');
        }
    } catch (error) {
        console.log('Error:', error);
        // If there's an error submitting to the server, save locally
        await saveFormData(formDataObject);
        console.log('Form data saved locally due to error');
    }
});

// Check online status and sync when back online
window.addEventListener('online', function() {
    console.log('Back online, syncing data...');
    syncWithServer();
});