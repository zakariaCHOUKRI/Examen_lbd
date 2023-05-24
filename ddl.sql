DROP DATABASE IF EXISTS ExamenLBD4;
CREATE DATABASE IF NOT EXISTS ExamenLBD4;
USE ExamenLBD4;

CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255),
  email VARCHAR(255),
  password VARCHAR(255),
  is_admin BOOLEAN
);

CREATE TABLE Elections (
  election_id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  start_date DATE,
  end_date DATE
);

CREATE TABLE Candidates (
  candidate_id INT AUTO_INCREMENT PRIMARY KEY,
  election_id INT,
  name VARCHAR(255),
  photo TEXT,
  FOREIGN KEY (election_id) REFERENCES Elections(election_id)
);

CREATE TABLE Votes (
  vote_id INT AUTO_INCREMENT PRIMARY KEY,
  election_id INT,
  user_id INT,
  vote INT,
  timestamp TIMESTAMP,
  FOREIGN KEY (election_id) REFERENCES Elections(election_id),
  FOREIGN KEY (user_id) REFERENCES Users(user_id),
  FOREIGN KEY (vote) REFERENCES Candidates(candidate_id)
);

CREATE TABLE Programs (
  program_id INT AUTO_INCREMENT PRIMARY KEY,
  candidate_id INT,
  program_title VARCHAR(255),
  program_description TEXT,
  program_video TEXT,
  program_affiche TEXT,
  FOREIGN KEY (candidate_id) REFERENCES Candidates(candidate_id)
);

-- email: admin@admin password: admin
INSERT INTO Users (username, email, password, is_admin) VALUES ('admin', 'admin@admin', '$2y$10$zo1Abi7dVKlH82EMwCC/heXiJY2tesEDqhfSe6arT/8nI3Wvg3fpe', 1);

-- email: student@student password: student
INSERT INTO Users (username, email, password, is_admin) VALUES ('student', 'student@student', '$2y$10$Wooi5rbG/umGPb1tFSz6VOtpuCCTzICuKE9sPTUOHqoDXHYVJ1jkq', 0);

