CREATE USER slave_read_user@'%' IDENTIFIED WITH mysql_native_password BY 'password';
GRANT REPLICATION SLAVE ON *.* TO slave_read_user@'%';
FLUSH PRIVILEGES;