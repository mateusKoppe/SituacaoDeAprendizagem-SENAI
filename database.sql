create database sa_senai;
use sa_senai;

create table courses_category(
	id int primary key auto_increment,
    descripton text null,
    name varchar(65) not null
);

create table courses(
	id int primary key auto_increment,
	active boolean default true,
    featured boolean default false,
    name varchar(50) not null,
    primary_image varchar(50) null,
    period enum('1', '2', '3') not null,
    table_description varchar(50) null,
    area varchar(20) null,
    category int not null,
    workload varchar(30) null,
    description text null,
    objective text null,
    target varchar(30) null,
    CONSTRAINT FK_category FOREIGN KEY (category) REFERENCES courses_category(id)
);

create table courses_skills(
	id int primary key auto_increment,
    value text not null,
    course int not null,
    CONSTRAINT FK_course FOREIGN KEY (course) REFERENCES courses(id)
);

create table courses_images(
	id int primary key auto_increment,
    name varchar(50) not null,
    course int not null,
    CONSTRAINT FK_image_course FOREIGN KEY (course) REFERENCES courses(id)
);

create table courses_videos(
	id int primary key auto_increment,
    name varchar(50) not null,
    course int not null,
    CONSTRAINT FK_video_course FOREIGN KEY (course) REFERENCES courses(id)
);

create table teachers(
	id int primary key auto_increment,
    name varchar(50) not null,
    formation text null,
    image varchar(50) null,
    linkedin varchar(25) null,
    interest_area varchar(30) null
);

create table courses_teachers(
	id int primary key auto_increment,
    teacher int not null,
    course int not null,
    CONSTRAINT FK_courses_teacher FOREIGN KEY (course) REFERENCES courses(id),
    CONSTRAINT FK_teacher_course FOREIGN KEY (teacher) REFERENCES teachers(id)
);

#environments
create table environments(
	id int primary key auto_increment,
    active boolean default true,
    featured boolean default false,
    name varchar(50) not null,
    description text null,
    capacity int null,
    size float null,
    primary_image varchar(50) null
);

create table environments_images(
	id int primary key auto_increment,
    name varchar(50) not null,
    environment int not null,
    CONSTRAINT FK_image_environment FOREIGN KEY (environment) REFERENCES environments(id)
);

create table environments_videos(
	id int primary key auto_increment,
    name varchar(50) not null,
    environment int not null,
    CONSTRAINT FK_video_environment FOREIGN KEY (environment) REFERENCES environments(id)
);

create table contacts(
	id int primary key auto_increment,
    name varchar(50) not null,
    email varchar(60) null,
    phone varchar(20) null,
	age int not null,
    want_be_studant boolean not null,
    subject varchar(100)
);

create table course_envionments(
	id int primary key auto_increment,
    environment int not null,
    course int not null,
    CONSTRAINT FK_course_environment FOREIGN KEY (course) REFERENCES courses(id),
    CONSTRAINT FK_environment_course FOREIGN KEY (environment) REFERENCES environments(id)
);

create table admins(
	id int primary key auto_increment,
    name varchar(50) not null,
    login varchar(25) not null unique,
    password varchar(32) not null
);

insert into admins (name, login, password) values ('Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');
