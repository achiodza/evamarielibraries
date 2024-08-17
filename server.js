const express = require('express');
const fetch = require('node-fetch');
require('dotenv').config();

const app = express();
app.use(express.json());

app.post('/login', (req, res) => {
  const { email, password } = req.body;

  fetch('http://203.161.49.218:1337/api/users/', {
    method: 'POST',
    headers: {
      'Authorization': `Bearer ${process.env.BEARER_TOKEN}`,
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ email, password })
  })
  .then(response => response.json())
  .then(data => {
    if (data.jwt) {
      res.json({ success: true, jwt: data.jwt });
    } else {
      res.status(401).json({ success: false, message: 'Invalid credentials' });
    }
  })
  .catch(error => {
    console.error('Error:', error);
    res.status(500).json({ success: false, message: 'Server error' });
  });
});

app.listen(3000, () => {
  console.log('Server is running on port 3000');
});
