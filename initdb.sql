create table
  users (
    id varchar(36) not null default (uuid ()),
    email text not null,
    password_hash text not null,
    primary key (id)
  );

create table
  clients (
    id varchar(36) not null default (uuid ()),
    name text not null,
    cpf text not null,
    rg text not null,
    phone text not null,
    birth_date timestamp not null,
    user_id varchar(36) not null,
    primary key (id),
    foreign key (user_id) references users (id) on delete cascade
  );

create table
  addresses (
    id varchar(36) not null default (uuid ()),
    street text not null,
    city text not null,
    state text not null,
    country text not null,
    postal_code text not null,
    client_id varchar(36) not null,
    primary key (id),
    foreign key (client_id) references clients (id) on delete cascade
  );

insert into
  users (id, email, password_hash)
values
  (
    '7ace1354-e3a3-11ee-a020-137d39a695f6',
    'john.doe@gmail.com',
    '$2y$10$mrQMZSanL328MTK5b224bOxT9zuNaciHd.m/AnrJNnQ5Q7q4FqGiC' -- '123456'
  );

insert into
  clients (id, name, cpf, rg, phone, birth_date, user_id)
values
  (
    '6045ccc4-e575-11ee-92b8-3d56f9de6e8b',
    'John Doe',
    '123.456.789-00',
    '1234567',
    '123456789',
    '1990-01-01',
    '7ace1354-e3a3-11ee-a020-137d39a695f6'
  );

insert into
  addresses (
    street,
    city,
    state,
    country,
    postal_code,
    client_id
  )
values
  (
    '123 Main St',
    'Anytown',
    'NY',
    'USA',
    '12345',
    '6045ccc4-e575-11ee-92b8-3d56f9de6e8b'
  );

insert into
  addresses (
    street,
    city,
    state,
    country,
    postal_code,
    client_id
  )
values
  (
    '123 Second St',
    'Second Town',
    'NY',
    'USA',
    '12345',
    '6045ccc4-e575-11ee-92b8-3d56f9de6e8b'
  );