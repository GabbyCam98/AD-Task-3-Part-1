CREATE TABLE IF NOT EXISTS projects (
    id uuid NOT NULL PRIMARY KEY DEFAULT gen_random_uuid(),
    name varchar(255) NOT NULL,
    description text,
    status varchar(50) NOT NULL DEFAULT 'planning',
    priority varchar(20) DEFAULT 'medium',
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);