---
draft: true
---
## EXERCICE 1

```
CREATE (max:Student {id:1, firstname:"Max", lastname:"LEPAN"})
CREATE (loic:Student {id:2, firstname:"Loïc", lastname:"GRECO"})
CREATE (alexandre:Student {id:3, firstname:"Alexandre", lastname:"DOMERGUES"})
CREATE (roxane:Student {id:4, firstname:"Roxane", lastname:"GUELLA"})
CREATE (yohan:Student {id:5, firstname:"Yohan", lastname:"QUINQUIS"})
CREATE (arthur:Student {id:6, firstname:"Arthur", lastname:"MONNET"})
CREATE (lea:Student {id:7, firstname:"Léa", lastname:"SIMONET"})
CREATE (bdd:Course {name:"BDD"})
CREATE (max)-[:LEARN {appreciation: 10}]->(bdd)
CREATE (loic)-[:LEARN {appreciation: 20}]->(bdd)
CREATE (alexandre)-[:LEARN {appreciation: 30}]->(bdd)
CREATE (roxane)-[:LEARN {appreciation: 40}]->(bdd)
CREATE (yohan)-[:LEARN {appreciation: 50}]->(bdd)
CREATE (arthur)-[:LEARN {appreciation: 60}]->(bdd)
CREATE (lea)-[:LEARN {appreciation: 70}]->(bdd)
CREATE (henri:Teacher  {id:42, firstname:"Henri", lastname:"LARGET"})
CREATE (henri)-[:TEACH]->(bdd)
```

## EXERCICE 2
```
# 1
MATCH (n:Material) RETURN n;

# 2
MATCH (n:Material{name:'Metal'}) RETURN n;

# 3
MATCH (n:Set) return COUNT(n);

# 4
MATCH (t:Theme{name:'Police'})<--(s:Set) return s.name;

# 5

MATCH(blacksmith:Set{name:'Medieval Blacksmith'})-->(:Inventory)-->(ip:InventoryPart)-->(c:Color) 
RETURN DISTINCT c.name as color ORDER BY color ASC;


# 6
MATCH(blacksmith:Set{name:'Medieval Blacksmith'})-->(:Inventory)-->(ip:InventoryPart)-->(c:Color) 
RETURN c.name as color,SUM(ip.quantity) AS total ORDER BY total DESC;

# 7
MATCH(boy:Set{name:"Elf Boy"})
MATCH(girl:Set{name:"Elf Girl"})
 return boy.id AS BOY,girl.id AS GIRL;
 
# 8
MATCH(:Set{name:"Elf Girl"})-->(:Inventory)-->(:InventoryPart)-->(girlParts:Part)
MATCH(:Set{name:"Elf Boy"})-->(:Inventory)-->(:InventoryPart)-->(boyParts:Part)
MATCH(qtBoy)-->(boyColor:Color)
MATCH(qtGirl)-->(girlColor:Color)
WHERE girlParts.id=boyParts.id
return DISCINT girlParts.name as PARTS;


# 9
MATCH(g:Set{name:"Elf Girl"})-->(:Inventory)-->(qtGirl:InventoryPart)-->(girlParts:Part)
MATCH(b:Set{name:"Elf Boy"})-->(:Inventory)-->(qtBoy:InventoryPart)-->(boyParts:Part)
MATCH(qtBoy)-->(boyColor:Color)
MATCH(qtGirl)-->(girlColor:Color)
WHERE girlParts.id=boyParts.id
AND qtGirl.quantity=qtBoy.quantity
AND girlColor.id=boyColor.id
return girlParts.name as name,qtBoy.quantity as quantity, boyColor.name as color;

# 10

MATCH (s:Set)
 return COUNT(DISTINCT s.id)



# 11

MATCH (i:InventoryPart)<--(:Inventory)<--(s:Set)
return ROUND( SUM(toFloat(i.quantity))/COUNT(DISTINCT s.id),2)

# 12

MATCH (i:InventoryPart)<--(:Inventory)<--(s:Set)
MATCH (i)-->(p:Part)
return ROUND( toFLoat(COUNT(p))/COUNT(DISTINCT s.id),2)


```
