CREATE TABLE ident_switch
(
	id
		serial
		PRIMARY KEY,
	user_id
		integer
		NOT NULL
		REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE,
	iid
		integer
		NOT NULL
		REFERENCES identities(identity_id) ON DELETE CASCADE ON UPDATE CASCADE
		UNIQUE,
	username
		varchar(64),
	password
		varchar(64),
	host
		varchar(64),
	port
		integer
		CHECK(port > 0 AND port <= 65535),
	delimiter
		char(1),
	label
		varchar(32),
	flags
		integer
		NOT NULL
		DEFAULT(0),
	UNIQUE (user_id, label)
);

CREATE INDEX
	IX_ident_switch_user_id
ON
	ident_switch(user_id);
