Table users {
id bigint [pk]
name varchar
email varchar
password varchar
created_at timestamp
updated_at timestamp
}

Table profile {
id bigint [pk]
user_id bigint [ref: - users.id, unique, not null]
created_at timestamp
updated_at timestamp
}

Table makers {
id bigint [pk]
profile_id bigint [ref: > profile.id]
name varchar
sales varchar
option varchar
star int
}

Table features {
id bigint [pk]
category_id bigint [ref: > categories.id,unique]
tag varchar
}

Table categories {
id bigint [pk]
name varchar
}

Table makers_features {
marker_id bigint [ref: > makers.id]
feature_id bigint [ref: > features.id]
}

Table landlogs {
id bigint [pk]
profile_id bigint [ref: > profile.id]
address varchar
landarea int
far tinyint
bcr tinyint
floor int
buildable_area int
range bigint
}

Table checklist_templates {
id bigint [pk]
profile_id bigint [ref: > profile.id]
template_list_id bigint [ref: > template_lists.id]
checked boolean
created_at timestamp
updated_at timestamp
}

Table template_lists {
id bigint [pk]
phase varchar
list varchar
}

Table checklist_customs {
id bigint [pk]
profile_id bigint [ref: > profile.id]
custom_list_id bigint [ref: > custom_lists.id]
checked boolean
created_at timestamp
updated_at timestamp
}

Table custom_lists {
id bigint [pk]
phase varchar
list varchar
}

