-- Create the user_form table to store user information
CREATE TABLE `user_form` (
  `id` INT(100) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Create the courses table to store course information
CREATE TABLE `courses` (
  `course_id` INT(100) NOT NULL AUTO_INCREMENT,
  `course_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Create the user_course table to link users and courses
CREATE TABLE `user_course` (
  `user_id` INT(100) NOT NULL,
  `course_id` INT(100) NOT NULL,
   `progress` INT(3) NOT NULL,
   `marks` INT(3) NOT NULL,
  PRIMARY KEY (`user_id`, `course_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user_form`(`id`),
  FOREIGN KEY (`course_id`) REFERENCES `courses`(`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Insert sample courses into the 'courses' table
INSERT INTO `courses` (`course_name`) VALUES
  ('Artificial Intelligence'),
  ('C++'),
  ('Cyber Security'),
  ('Data Analytics'),
  ('Data Science'),
  ('DevOps'),
  ('FullStack Development'),
  ('IT Automation'),
  ('Java'),
  ('Machine Learning'),
  ('Python'),
  ('UI/UX Design');


-- Create a simplified feedback table
CREATE TABLE `feedback` (
  `feedback_id` INT(100) NOT NULL AUTO_INCREMENT,
  `user_id` INT(100) NOT NULL,
  `feedback_text` TEXT NOT NULL,
  PRIMARY KEY (`feedback_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user_form`(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;


