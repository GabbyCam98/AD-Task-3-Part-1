CREATE TABLE IF NOT EXISTS public.newtable (
    id int NOT NULL PRIMARY KEY,
    username varchar(256) NOT NULL,
    password varchar(256) NOT NULL,
    "firstName" varchar(256) NOT NULL,
    "middleName" varchar(256),
    "lastName" varchar(256)
);