create table topics (
    id serial primary KEY
    name varchar(30) NOT NULL
)

insert into topic(name) values('Faith'), ('Sacrifice'),('Charity')

CREATE TABLE scriptures (
	id SERIAL PRIMARY KEY,
	book VARCHAR(30),
	chapter INT,
	verse INT,
	content TEXT
);

CREATE table scripture_topic(
    id serial primary key,
    scripture_id int references scriptures(id),
    topic_id int references topics(id)
)