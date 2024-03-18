-- This file is used to create the MySQL database and tables for the application.

create schema if not exists myapp default character set utf8mb4 collate utf8mb4_unicode_ci;

use
myapp;

create table if not exists users
(
    id
    varchar
(
    36
) not null default uuid
(
),
    email text not null,
    password_hash text not null,
    primary key
(
    id
)
    );

create table if not exists clients
(
    id
    varchar
(
    36
) not null default uuid
(
),
    name text not null,
    cpf text not null,
    rg text not null,
    phone text not null,
    birth_date timestamp not null,
    user_id varchar
(
    36
) not null,
    primary key
(
    id
),
    foreign key
(
    user_id
) references users
(
    id
)
    );

create table if not exists addresses
(
    id
    varchar
(
    36
) not null default uuid
(
),
    street text not null,
    city text not null,
    state text not null,
    country text not null,
    postal_code text not null,
    client_id varchar
(
    36
) not null,
    primary key
(
    id
),
    foreign key
(
    client_id
) references clients
(
    id
)
    );

insert into users (email, password_hash)
values ('john.doe@gmail.com', '$2y$10$mrQMZSanL328MTK5b224bOxT9zuNaciHd.m/AnrJNnQ5Q7q4FqGiC');

insert into clients (name, cpf, rg, phone, birth_date, user_id)
values ('John Doe', '123.456.789-00', '1234567', '123456789', '1990-01-01',
        (select id from users where email = 'john.doe@gmail.com'));

insert into addresses (street, city, state, country, postal_code, client_id)
values ('123 Main St', 'Anytown', 'NY', 'USA', '12345', (select id from clients where name = 'John Doe'));