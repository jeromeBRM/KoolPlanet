create table user (
    id integer auto_increment,
    login varchar(30) not null,
    password text not null,
    mail varchar(255) not null,
    constraint pk_user primary key (id)
);

create table post(
    id integer auto_increment,
    author_id integer not null,
    content text not null,
    posted_at datetime not null,
    constraint pk_post primary key (id),
    foreign key (author_id) references user(id)
);

create table article(
    post_id integer,
    media_id integer,
    title text not null,
    foreign key (post_id) references post(id),
    foreign key (media_id) references media(id)
);

create table topic(
    post_id integer,
    media_id integer,
    title text not null,
    score integer,
    foreign key (post_id) references post(id),
    foreign key (media_id) references media(id)
);

create table reply(
    post_id integer,
    topic_id integer,
    foreign key (post_id) references post(id),
    foreign key (topic_id) references topic(post_id)
);

create table category(
    id integer auto_increment,
    name text not NULL,
    constraint pk_category primary key (id) 
);

create table profile(
    user_id integer,
    media_id integer,
    description text,
    rank tinyint,
    foreign key (user_id) references user(id),
    foreign key (media_id) references media(id)
);

create table media(
    id integer auto_increment,
    name text not null,
    type tinyint,
    constraint pk_media primary key (id)
);