var cfg = {};

// HTTP Port to run our web application
cfg.port = process.env.PORT || 3000;

// A random string that will help generate secure one-time passwords and
// HTTP sessions
cfg.secret = process.env.APP_SECRET || 'keyboard cat';

// Your Twilio account SID and auth token, both found at:
// https://www.twilio.com/user/account
//
// A good practice is to store these string values as system environment
// variables, and load them from there as we are doing below. Alternately,
// you could hard code these values here as strings.
cfg.accountSid = 'AC7bbfcacc4817f964707f86d4f87ecc80'; //process.env.TWILIO_ACCOUNT_SID;
cfg.authToken =  'd0fe1f802e306488ac139496f4f692f0' ; //process.env.TWILIO_AUTH_TOKEN;

// A Twilio number you control - choose one from:
// https://www.twilio.com/user/account/phone-numbers/incoming
// Specify in E.164 format, e.g. "+16519998877"
cfg.twilioNumber =  '+12014489431';// process.env.TWILIO_NUMBER; //

// MongoDB connection string - MONGO_URL is for local dev,
// MONGOLAB_URI is for the MongoLab add-on for Heroku deployment
//cfg.mongoUrl = process.env.MONGOLAB_URI || process.env.MONGO_URL

// Export configuration object
module.exports = cfg;
