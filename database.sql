create table user (
    id integer,
    login varchar(255) unique not null,
    password text not null,
    avatar varchar(255),
    description text,
    registration_date date not null,
    constraint pk_user primary key (id)
);

create table topic (
    id integer,
    author_id integer not null,
    tag_id integer not null,
    title text unique not null,
    content text not null,
    posted_at datetime not null,
    constraint pk_post primary key (id),
    constraint fk_author foreign key (author_id) references user(id),
    constraint fk_tag foreign key (tag_id) references tag(id)
);

create table reply (
    id integer,
    author_id integer not null,
    topic_id integer not null,
    content text not null,
    posted_at datetime not null,
    constraint pk_reply primary key (id),
    constraint fk_author foreign key (author_id) references user(id),
    constraint fk_topic foreign key (topic_id) references topic(id)
);

create table tag (
    id integer,
    label varchar(32) unique not null,
    constraint pk_tag primary key (id)
);

insert into tag (label)
values ("Discussion"), ("Tuto"), ("Photographie"), ("-18");