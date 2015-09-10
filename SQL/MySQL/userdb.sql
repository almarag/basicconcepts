-- Example of MySQL Database

CREATE DATABASE 'userdb';

CREATE TABLE 'tbl_users'
(
	id INT(11) NOT NULL AUTO_INCREMENT,
	fullname VARCHAR(255),
	username VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	email VARCHAR(255) NOT NULL,
	
	PRIMARY KEY (id),
	INDEX idx_users_fullname (fullname),
	INDEX idx_users_username (username),
	INDEX idx_users_email (email)
	
)ENGINE=InnoDB;

INSERT INTO tbl_users (fullname,username,password,email) VALUES ('Alejandro Martinez','almarag',MD5('testpwd01$'),'almarag@gmail.com');
INSERT INTO tbl_users (fullname,username,password,email) VALUES ('Juan Perez','jperez',MD5('testpwd02$'),'juan@example.com');

CREATE TABLE 'tbl_permissions'
(
	id INT(11) NOT NULL AUTO_INCREMENT,
	description VARCHAR(255) NOT NULL,
	
	PRIMARTY KEY (id),
	INDEX idx_permissions_description (description)
)ENGINE=InnoDB;

INSERT INTO tbl_permissions (description) VALUES ('Admin');
INSERT INTO tbl_permissions (description) VALUES ('User');
INSERT INTO tbl_permissions (description) VALUES ('Guest');

CREATE TABLE 'tbl_users_permissions'
(
	userid INT(11) NOT NULL,
	permissionid INT(11) NOT NULL,
	
	PRIMARY KEY (userid,permissionid),
	INDEX idx_user_permissions_permission (userid, permissionid)
)ENGINE=InnoDB;

INSERT INTO tbl_users_permissions (userid, permissionid) VALUES (1,1);
INSERT INTO tbl_users_permissions (userid, permissionid) VALUES (1,2);
INSERT INTO tbl_users_permissions (userid, permissionid) VALUES (2,3);

CREATE VIEW 'vw_permissions_by_user'
AS 
SELECT
u.id,
u.fullname,
u.username,
u.email,
(SELECT 
	CASE
		WHEN up.userid = u.id THEN 'y'
		WHEN up.userid IS NULL THEN 'n' 
    END
 FROM tbl_users_permissions up
 WHERE u.id = up.id AND up.permissionid = 1) AS is_admin,
(SELECT 
	CASE
		WHEN up.userid = u.id THEN 'y'
		WHEN up.userid IS NULL THEN 'n' 
    END
 FROM tbl_users_permissions up
 WHERE u.id = up.id AND up.permissionid = 2) AS is_user,
(SELECT 
	CASE
		WHEN up.userid = u.id THEN 'y'
		WHEN up.userid IS NULL THEN 'n' 
    END
 FROM tbl_users_permissions up
 WHERE u.id = up.id AND up.permissionid = 3) AS is_guest, 
FROM
tbl_users u