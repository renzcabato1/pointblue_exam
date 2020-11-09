
const express = require("express");
var mysql = require('mysql');



const app = express();
app.get('/get_all_data',(req,res) =>
{
  var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "pointblue"
  });
  res.header('Access-Control-Allow-Origin', '*');
  con.connect(function(err) {
    if (err) throw err;
    con.query("SELECT * FROM file_leave", function (err, result, fields) {
      if (err) throw err;
      res.send(result);
      
    });
  });
}
);


app.get('/submit-request/:leave_type/:date_from/:remarks/:leave_count/:date_filed',(req,res) =>
{
  var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "pointblue"
  });
  res.header('Access-Control-Allow-Origin', '*');
  res.send(req.params);
  
  con.connect(function(err) {
    if (err) throw err;
    con.query("insert into file_leave (leave_type,date_from,date_filed,remarks,leave_count) values('"+req.params.leave_type+"','"+req.params.date_from+"','"+req.params.date_filed+"','"+req.params.remarks+"','"+req.params.leave_count+"')", function (err, result, fields) {
      if (err) throw err;
      console.log('renz');
    });
  });
}
);

app.listen(3000,() => console.log('Listening on port 3000....'));
