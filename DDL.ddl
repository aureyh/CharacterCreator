
drop table itemEquip;
drop table armorEquip;
drop table weaponEquip;
drop table itemSkill;
drop table armorSkill;
drop table weaponSkill;
drop table creatureSkill;
drop table inventory;
drop table armorAbility;
drop table weaponAbility;
drop table itemAbility;
drop table creatureAbility;
drop table Ability;
drop table Armor;
drop table Weapon;
drop table Item;
drop table requirment;
drop table Buff;
drop table Skill;
drop table Creature;


create table Creature(
name varchar(50) primary key,
gender varchar(10),
race varchar(50),
age int,
lvl int,
hp int,
mp int,
str int,
dex int,
intel int,
per int,
chr int,
spd int,
ar int
);

create table Buff(
name varchar(100) primary key,
hp int,
mp int,
str int,
dex int,
intel int,
per int,
chr int,
sp int,
ar int
);

create table requirment(
name varchar(100) primary key,
hp int,
mp int,
str int,
dex int,
intel int,
per int,
chr int,
sp int,
ar int,
des varchar(100)
);

create table Skill(
name varchar(100) primary key,
lvl int,
des varchar(250)
);

create table Item(
name varchar(100) primary key,
des varchar(250),
req varchar(100),
foreign key (req) references requirment (name)
);

create table Weapon(
name varchar(100) primary key,
dmg int,
type varchar(50),
des varchar(250),
req varchar(100),
foreign key (req) references requirment (name)
);

create table Armor(
name varchar(100) primary key,
ar int,
type varchar(50),
des varchar(250),
req varchar(100),
foreign key (req) references requirment (name)
);

create table Ability(
name varchar(100) primary key,
buff varchar(100),
duration int,
dmg int,
req varchar(100),
des varchar(250),
catagory varchar(50),
foreign key (buff) references Buff(name),
foreign key (req) references requirment(name)
);

create table creatureAbility(
name varchar(100),
ability varchar(100),
foreign key (name) references Creature(name),
foreign key (ability) references Ability(name)
);



create table itemAbility(
name varchar(100),
ability varchar(100),
foreign key (name) references Item(name),
foreign key (ability) references Ability(name)
);

create table weaponAbility(
name varchar(100),
ability varchar(100),
foreign key (name) references Weapon(name),
foreign key (ability) references Ability(name)
);

create table armorAbility(
name varchar(100),
ability varchar(100),
foreign key (name) references Armor(name),
foreign key (ability) references Ability(name)
);

create table Inventory(
wname varchar(100),
aname varchar(100),
iname varchar(100),
qty int,
foreign key (wname) references Weapon(name),
foreign key (aname) references Armor(name),
foreign key (iname) references Item(name)
);

create table creatureSkill(
name varchar(100),
skill varchar(100),
foreign key (name) references Creature(name),
foreign key (skill) references Skill(name)
);

create table weaponSkill(
name varchar(100),
skill varchar(100),
foreign key (name) references Weapon(name),
foreign key (skill) references Skill(name)
);

create table armorSkill(
name varchar(100),
skill varchar(100),
foreign key (name) references Armor(name),
foreign key (skill) references Skill(name)
);

create table itemSkill(
name varchar(100),
skill varchar(100),
foreign key (name) references Item(name),
foreign key (skill) references Skill(name)
);

create table weaponEquip(
name varchar(100),
weapon varchar(100),
equiped int,
foreign key(name) references Creature(name),
foreign key(weapon) references Weapon(name)
);

create table armorEquip(
name varchar(100),
armor varchar(100),
equiped int,
foreign key(name) references Creature(name),
foreign key(armor) references Armor(name)
);


create table itemEquip(
name varchar(100),
item varchar(100),
equiped int,
foreign key(name) references Creature(name),
foreign key(item) references Item(name)
);


