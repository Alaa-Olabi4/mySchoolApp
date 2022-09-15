CREATE TABLE `mathMarks`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `teacher_id` INT UNSIGNED NOT NULL,
    `student_id` INT UNSIGNED NOT NULL,
    `value` INT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `mathMarks` ADD PRIMARY KEY `mathmarks_id_primary`(`id`);
ALTER TABLE
    `mathMarks` ADD PRIMARY KEY `mathmarks_teacher_id_primary`(`teacher_id`);
ALTER TABLE
    `mathMarks` ADD PRIMARY KEY `mathmarks_student_id_primary`(`student_id`);
CREATE TABLE `englishMarks`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `teacher_id` INT UNSIGNED NOT NULL,
    `student_id` INT UNSIGNED NOT NULL,
    `value` INT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `englishMarks` ADD PRIMARY KEY `englishmarks_id_primary`(`id`);
ALTER TABLE
    `englishMarks` ADD PRIMARY KEY `englishmarks_teacher_id_primary`(`teacher_id`);
ALTER TABLE
    `englishMarks` ADD PRIMARY KEY `englishmarks_student_id_primary`(`student_id`);
CREATE TABLE `arabicMarks`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `teacher_id` INT UNSIGNED NOT NULL,
    `student_id` INT UNSIGNED NOT NULL,
    `value` INT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `arabicMarks` ADD PRIMARY KEY `arabicmarks_id_primary`(`id`);
ALTER TABLE
    `arabicMarks` ADD PRIMARY KEY `arabicmarks_teacher_id_primary`(`teacher_id`);
ALTER TABLE
    `arabicMarks` ADD PRIMARY KEY `arabicmarks_student_id_primary`(`student_id`);
CREATE TABLE `marks`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `student_id` INT UNSIGNED NOT NULL,
    `arabic` INT NOT NULL,
    `english` INT NOT NULL,
    `math` INT NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `marks` ADD PRIMARY KEY `marks_id_primary`(`id`);
ALTER TABLE
    `marks` ADD PRIMARY KEY `marks_student_id_primary`(`student_id`);
ALTER TABLE
    `marks` ADD PRIMARY KEY `marks_arabic_primary`(`arabic`);
ALTER TABLE
    `marks` ADD PRIMARY KEY `marks_english_primary`(`english`);
ALTER TABLE
    `marks` ADD PRIMARY KEY `marks_math_primary`(`math`);
CREATE TABLE `students`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `marks_id` INT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `students` ADD PRIMARY KEY `students_id_primary`(`id`);
ALTER TABLE
    `students` ADD PRIMARY KEY `students_user_id_primary`(`user_id`);
ALTER TABLE
    `students` ADD PRIMARY KEY `students_marks_id_primary`(`marks_id`);
CREATE TABLE `teachers`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `subject` VARCHAR(255) NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `teachers` ADD PRIMARY KEY `teachers_id_primary`(`id`);
ALTER TABLE
    `teachers` ADD PRIMARY KEY `teachers_user_id_primary`(`user_id`);
CREATE TABLE `users`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `kind` VARCHAR(255) NOT NULL,
    `FirstName` VARCHAR(255) NOT NULL,
    `LastName` VARCHAR(255) NOT NULL,
    `Email` VARCHAR(255) NOT NULL,
    `Password` VARCHAR(255) NOT NULL,
    `RememberToken` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    `updated_at` TIMESTAMP NOT NULL
);
ALTER TABLE
    `users` ADD PRIMARY KEY `users_id_primary`(`id`);
ALTER TABLE
    `users` ADD UNIQUE `users_email_unique`(`Email`);