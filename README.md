# IVVC-Field-Trip
An app for sophomores attending the field trip to IVVC.
Probably not very useful for anyone other than the 11 schools who feed to the Indian Valley Vocational Center

```SQL
CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```SQL
CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseDescription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```SQL
CREATE TABLE `student` (
  `PE Period` int(11) NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Student ID` int(7) NOT NULL,
  `studentNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```SQL
CREATE TABLE `surveys` (
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `studentID` int(7) NOT NULL,
  `course1` varchar(100) NOT NULL,
  `course2` varchar(100) NOT NULL,
  `course3` varchar(100) NOT NULL,
  `Morning` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

```SQL
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `student`
  ADD PRIMARY KEY (`studentNo`);

ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `student`
  MODIFY `studentNo` int(11) NOT NULL AUTO_INCREMENT;
  ```
