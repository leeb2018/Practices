// require express
var express = require("express");

// path module -- try to figure out where and why we use this 
// (to find the location of directory relative to the root)
var path = require("path");

// require mongoose and create the mongoose variable
var mongoose = require('mongoose');

// This is how we connect to the mongodb database using mongoose -- "basic_mongoose" is the name of our db in mongodb -- this should match the name of the db you are going to use for your project.
var connection = mongoose.connect('mongodb://localhost/basic_mongoose');

// create the express app
var app = express();

// require body-parser
var bodyParser = require('body-parser');

// use it!
app.use(bodyParser.urlencoded());

var UserSchema = new mongoose.Schema({
    name: String,
    age: Number
})
var User = mongoose.model('User', UserSchema);

// static content 
app.use(express.static(path.join(__dirname, "./static")));

// setting up ejs and our views folder
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

// root route to render the index.ejs view
app.get('/', function(req, res) {
    console.log(req.headers);
    res.render("index");
})

// post route for adding a user
app.post('/users', function(req, res) {
    console.log("POST DATA", req.body);
    // create a new User with the name and age corresponding to those from req.body
    var user = new User({name: req.body.name, age: req.body.age});
    // try to save that new user to the database (this is the method that actually inserts into the db) and run a callback function with an error (if any) from the operation.
    user.save(function(err, user) {
    // if there is an error console.log that something went wrong!
        if(err) {
            console.log('something went wrong');
        } else { // else console.log that we did well and then redirect to the root route
            console.log('successfully added a user!');
            console.log(user);
            // res.redirect('/');
        }
    })
    res.redirect('/');
})

// tell the express app to listen on port 8000
app.listen(8000, function() {
 console.log("listening on port 8000");
})
