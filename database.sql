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
    category varchar(20) null,
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
    CONSTRAINT FK_course FOREIGN KEY (course) REFERENCES courses(id)
);

create table courses_videos(
	id int primary key auto_increment,
    name varchar(50) not null,
    course int not null,
    CONSTRAINT FK_course FOREIGN KEY (course) REFERENCES courses(id)
);

create table teachers(
	id int primary key auto_increment,
    name varchar(50) not null,
    formation text null,
    interest_area varchar(30) null
);

create table course_teachers(
	id int primary key auto_increment,
    teacher int not null,
    course int not null,
    CONSTRAINT FK_course FOREIGN KEY (course) REFERENCES courses(id),
    CONSTRAINT FK_teacher FOREIGN KEY (teachers) REFERENCES teachers(id)
);

create table environments(
	id int primary key auto_increment,
    active boolean default true,
    featured boolean default false,
    name varchar(50) not null,
    primary_image varchar(50) null
)
