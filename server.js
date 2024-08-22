// Example using Express.js for the server-side endpoint

const express = require('express');
const bodyParser = require('body-parser');
const fetch = require('node-fetch'); // Assuming you're using node-fetch for API requests

const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());

// Replace this with your actual API URL and token
const API_URL = 'http://203.161.49.218:1337/api/users/';
const AUTH_TOKEN = 'd68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b'; 

app.post('/api/login', async (req, res) => {
  const { email, password } = req.body;

  try {
    const response = await fetch(API_URL, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${AUTH_TOKEN}`,
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        email: email,
        password: password
      })
    });

    const data = await response.json();
    if (data.jwt) {
      res.json({ success: true, jwt: data.jwt });
    } else {
      res.status(401).json({ success: false, message: 'Invalid credentials' });
    }
  } catch (error) {
    console.error('Error:', error);
    res.status(500).json({ success: false, message: 'An error occurred during login' });
  }
});

app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});
