create table user (
    id integer primary key,
    login varchar(255) not null,
    created_at not null,
    is_admin
)

select login, created_at, is_admin
from user as u
join games as g on u.id = g.user_id