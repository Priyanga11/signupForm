const express = require('express')
const app = express()

const bodyParser = require("body-parser");

// get the client
const mysql = require('mysql2');
// app.use(bodyParser.urlencoded({extended: false}));
app.use(bodyParser.json());
app.use(
  bodyParser.urlencoded({
    execute: true,
  })
);


// create the connection to database
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: 'Priya@11',
  database: 'formdb',
  // multipleStatements:true
});


// pool.getConnection(function(err,con){
//   echo("sdjbjd");
// })
connection.execute(
    'SELECT * FROM formdb.signup WHERE `username` = ? AND `password` > ?',
    ['Priya', 'Sdfg@1234'],
    function(err, results, fields) {
      //console.log(results); // results contains rows returned by server
      //console.log(fields); // fields contains extra meta data about results, if available
  
      // If you execute same statement again, it will be picked from a LRU cache
      // which will save query preparation time and give better performance
    }
  );



app.get('/getstudent', function (req, res) {
  // connection.getConnection((err,con)=>{
    connection.query(
      'SELECT * FROM formdb.signup ',
      function(err, results, fields) {
        if(err){
          console.log(err);
        }
        else{
          res.send(results);

        }
        //console.log(results); // results contains rows returned by server
                 //console.log(fields); // fields contains extra meta data about results, if available
      // });
  })
});
app.post('/createid', function (req, res) {
  var postData = req.body;
    connection.query(
      'INSERT into formdb.signup set ? ' ,
      postData,
        function(err, results, fields) {
          if(err){
            console.log(err);
          }else{
            res.send("Created row");
          }
          console.log(results); // results contains rows returned by server
          
          console.log(fields); // fields contains extra meta data about results, if available
        }
      );

});
app.put('/updatedata/:id', function (req, res) {
  var postData = req.body;
    connection.query(
        'UPDATE formdb.signup SET ? WHERE `id`= ? ',
        [postData,parseInt(req.params.id)],
        function(err, results, fields) {
          //console.log(results); // results contains rows returned by server
          res.send("Updated Successfully");
          //console.log(fields); // fields contains extra meta data about results, if available
        }
      );

});
// app.put('/updatedata/:id',function(req,res){
    
//   connection.query(
//     "UPDATE formdb.signup SET ? where `id`=?",
//   parseInt(req.body.id),
//   function(error,results,fields){
//       // if(err) throw err;
//       // res.send("Record updated");
//       // res.redirect('/home');
//   });
// });
app.delete('/deletedata/:id', function (req, res) {
  var postData = req.body;
    connection.query(
        'DELETE from formdb.signup where `id` = ?',
        // postData.id,
        parseInt(req.params.id),
        function(err, results, fields) {
        //console.log(results); // results contains rows returned by server
          res.send("Deleted Successfully");
        //console.log(fields); // fields contains extra meta data about results, if available
        }
      );

});
app.listen(4200);
module.exports=connection;