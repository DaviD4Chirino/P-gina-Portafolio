const mysql = require('mysql');
const connection = mysql.createConnection({
  host: 'localhost2000',
  user: 'root',
  password: '',
});

connection.connect((error) => {
  if(error){
    console.log('Error connecting to the MySQL Database');
    return;
  }
  console.log('Connection established sucessfully');
});
connection.end((error) => {
});
