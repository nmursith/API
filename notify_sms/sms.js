'use strict'

const express = require('express')
const bodyParser = require('body-parser')

// Create a new instance of express
const app = express()

// Tell express to use the body-parser middleware and to not parse extended bodies
app.use(bodyParser.urlencoded({ extended: false }))

// Route that receives a POST request to /sms
app.post('/sms', function (req, res) {
  const body = req.body.Text;
  const phone = '+94719356519'; //req.body.phone |

  console.log(req.body);
  var text =  req.body.Text;
  var client = require('twilio')(
    'AC7bbfcacc4817f964707f86d4f87ecc80',
    'd0fe1f802e306488ac139496f4f692f0'
  );

  client.messages.create({
    from: '+12014489431',
    to: phone,
    body: text
  }, function(err, message) {
      if(err) {
          console.error(err.message);


          res.set('Content-Type', 'text/plain');
          res.send(`Error: ${err.message} to Express`);
      }
      else{
        res.set('Content-Type', 'text/plain');
        res.send(`Error: ${text} to Express`);

      }
  });





})

// Tell our app to listen on port 3000
app.listen(3000, function (err) {
  if (err) {
    throw err
  }

  console.log('Server started on port 3000')
})
