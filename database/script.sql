create database booking;
use `booking`;
/* create features table */
create table features
(
    id int primary key not null auto_increment,
    icon text not null,
    title varchar(50) not null,
    description text not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp
);
/* create features trigger */
delimiter $$
CREATE TRIGGER update_at_on_features_trigger
BEFORE UPDATE ON features
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create newsletters table */
create table newsletters 
(
    id int primary key not null auto_increment,
    email varchar(320) not null,
	created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp
);
/* create newsletter trigger */
delimiter $$
CREATE TRIGGER update_at_on_newsletters_trigger
BEFORE UPDATE ON newsletters
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create images table */
create table images
(
	id int primary key not null auto_increment,
    url text not null,
    alt_title varchar(50) null,
    images_id varchar(50) not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp 
);
/* create images trigger */
delimiter $$
CREATE TRIGGER update_at_on_images_trigger
BEFORE UPDATE ON images
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create agents table */
create table agents
(
	id int primary key not null auto_increment,
    name varchar(50) not null,
    email varchar(320) not null,
    password text not null,
    score int not null,
    images_id varchar(50) not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp 
);
/* create agents trigger*/
delimiter $$
CREATE TRIGGER update_at_on_agents_trigger
BEFORE UPDATE ON agents
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create homes table */
create table homes
(
	id int primary key not null auto_increment,
    thumbnail_id varchar(50) not null,
    adress text not null,
    rooms int not null,
    surface int not null,
    price decimal(10,2) not null,
    title varchar(50) null,
    images_id varchar(50) not null,
    agent_id int not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp 
);
/* create homes trigger*/
delimiter $$
CREATE TRIGGER update_at_on_homes_trigger
BEFORE UPDATE ON homes
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create partners table */
create table partners
(
	id int primary key not null auto_increment,
    image_id varchar(50) not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp    
);
/* create partners trigger */
delimiter $$
CREATE TRIGGER update_at_on_partners_trigger
BEFORE UPDATE ON partners
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;
/* create galery table */
create table gallery
(
	id int primary key not null auto_increment,
    images_id varchar(50) not null,
    created_at timestamp not null default current_timestamp,
    updated_at timestamp not null default current_timestamp  
);
/* create gallery trigger */
delimiter $$
CREATE TRIGGER update_at_on_gallery_trigger
BEFORE UPDATE ON gallery
FOR EACH ROW 
BEGIN    
	SET NEW.updated_at = current_timestamp() , NEW.created_at = OLD.created_at ;    
END$$
delimiter ;