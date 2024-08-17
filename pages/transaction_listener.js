const fs = require('fs');
const jsonfile = require('jsonfile');

// Function to process the new record
function processRecord(record) {
    // Assign an ID to the record
    //record.id = Date.now(); // Using timestamp as ID


    // Append the record to history_transactions.json
    jsonfile.readFile('history_transactions.json', (err, data) => {
        if (err) {
            console.error('Error reading history_transactions.json:', err);
            return;
        }
       
        data.push(record);

        jsonfile.writeFile('history_transactions.json', data, { spaces: 2 }, err => {
            if (err) {
                console.error('Error writing to history_transactions.json:', err);
                return;
            }
            console.log('Record added to history_transactions.json:', record);
        });
    });
}

// Watch for changes in transaction_data.json
fs.watchFile('transaction_data.json', (curr, prev) => {
    console.log('transaction_data.json has been updated');

    // Read the new record
    jsonfile.readFile('transaction_data.json', (err, data) => {
        if (err) {
            console.error('Error reading transaction_data.json:', err);
            return;
        }

        // Process the new record
        const newRecord = data; // Assuming the data is an object with getuid and date fields
        processRecord(newRecord);
    });
});
