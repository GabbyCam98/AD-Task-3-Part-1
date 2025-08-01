CREATE TABLE IF NOT EXISTS public."users" (
      user_id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
      first_name varchar(225) NOT NULL,
      middle_name varchar(225),
      last_name varchar(225) NOT NULL,
      password varchar(225) NOT NULL,
      username varchar(225) NOT NULL,
      email varchar(225),
      "role" varchar(225) NOT NULL DEFAULT 'user'
  );