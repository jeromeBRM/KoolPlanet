create table user (
    id integer,
    login varchar(255) not null,
    password text not null,
    constraint pk_user primary key (id)
);

create table topic(
    id integer,
    author_id integer not null,
    title text not null,
    content text not null,
    posted_at datetime not null,
    constraint pk_post primary key (id),
    constraint fk_author foreign key (author_id) references user(id)
);

create table reply(
    id integer,
    author_id integer not null,
    topic_id integer not null,
    content text not null,
    posted_at datetime not null,
    constraint pk_reply primary key (id),
    constraint fk_author foreign key (author_id) references user(id)
    constraint fk_topic foreign key (topic_id) references topic(id)
);