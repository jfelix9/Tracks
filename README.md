# Tracks: a PhD progress tracking tool

### Intro
Tracks is a MAMP stack based CMS that allows PhD students to post their progress milestones and allows school faculty and administrators to analyze trends.

### Purpose and Intended Audience
The purpose of the Ph.D. Progress Tracking Tool is to track Ph.D. students' progress at The University of
Texas at El Paso (UTEP) during and after their Ph.D. degree conferral. This tool is proposed by our client,
Dr. Daniel Mejia, from the UTEP Computer Science Department. The intended audience of this tool will be
a set of users, consisting of current UTEP CS faculty and Ph.D. Students, including administrators, advisors,
current students, and alumni. There are two end goals for this project. One goal is to ensure non-graduated
students are progressing towards their degrees in a timely manner. The second goal is to track the graduated
student's professional career post-graduation. The website will follow the basic guidelines set by UTEP.

### Domain
The mini-world for the database is as follows: Computer Science Front Desk, Computer Science Students, Computer
Science Advisors, Computer Science Admin.

### Key Entities and Relations
Student: a student may be either a current or former PhD student of UTEP's Department of Computer Science.
Each student will have a profile in the system. Their profile will store their login information (username
and password) as well as several attributes that work to track their progress in the PhD program. Each student
will only be able to view their own information.
Advisor: an advisor any individual that advises students. Each advisor will have a profile in the system.
Their profile will store their login information (username and password). Each advisor will have viewing access limited to the students they advise.
Admin: an admin will be any individual given admin privileges by the UTEP Computer Science Department.
Each advisor will have a profile in the system. Their profile will store their login information (username
and password). Each admin will have viewing access to all advisor and student profiles in the system.
