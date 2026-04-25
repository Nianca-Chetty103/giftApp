-- ============================================
--  GiftGenie Database Schema
--  Run this file once to set up your database
-- ============================================

CREATE DATABASE IF NOT EXISTS giftgenie CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE giftgenie;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    name        VARCHAR(100)        NOT NULL,
    email       VARCHAR(150)        UNIQUE NOT NULL,
    password    VARCHAR(255)        NOT NULL,
    created_at  TIMESTAMP           DEFAULT CURRENT_TIMESTAMP
);

-- Saved gifts table
CREATE TABLE IF NOT EXISTS saved_gifts (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    user_id      INT             NOT NULL,
    gift_name    VARCHAR(200)    NOT NULL,
    gift_why     TEXT,
    gift_cost    VARCHAR(50),
    gift_effort  VARCHAR(50),
    gift_type    VARCHAR(50),
    occasion     VARCHAR(100),
    recipient    VARCHAR(200),
    mode         ENUM('thoughtful','convenient') DEFAULT 'thoughtful',
    created_at   TIMESTAMP       DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Gift generation history (for analytics / repeat suggestions)
CREATE TABLE IF NOT EXISTS generation_log (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    session_id   VARCHAR(100),
    occasion     VARCHAR(100),
    recipient    VARCHAR(255),
    budget       INT,
    mode         VARCHAR(20),
    created_at   TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert a demo user (password: demo1234)
INSERT IGNORE INTO users (name, email, password)
VALUES ('Demo User', 'demo@giftgenie.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
