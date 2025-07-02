CREATE TABLE IF NOT EXISTS project_users (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    project_id INTEGER NOT NULL REFERENCES projects (id),
    user_id INTEGER NOT NULL REFERENCES users (id),
    PRIMARY KEY (project_id, user_id)
);