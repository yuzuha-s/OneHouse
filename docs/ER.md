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
category_id bigint [ref: < categories.id]
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

Table checklistTemplates {
id bigint [pk]
profile_id bigint [ref: > profile.id]
templateList_id bigint [ref: < templateLists.id, null]
checked boolean
created_at timestamp
updated_at timestamp
}

Table templateLists {
id bigint [pk]
phase varchar
list varchar
}

Table checklistCustoms {
id bigint [pk]
profile_id bigint [ref: > profile.id]
customList_id bigint [ref: < customLists.id]
checked boolean
created_at timestamp
updated_at timestamp
}

Table customLists {
id bigint [pk]
phase varchar
list varchar
}