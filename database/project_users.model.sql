CREATE TABLE IF NOT EXISTS project_users (
    project_id uuid NOT NULL REFERENCES projects (id) ON DELETE CASCADE,
    user_id uuid NOT NULL REFERENCES users (user_id) ON DELETE CASCADE,
    assigned_at timestamp DEFAULT CURRENT_TIMESTAMP,
    role_in_project varchar(100) DEFAULT 'member',
    PRIMARY KEY (project_id, user_id)
);