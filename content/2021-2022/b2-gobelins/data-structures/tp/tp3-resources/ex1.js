let main = Array.from({length: 1000}, (_, i) => i + 1)
let list2 = [];
let list3=[];

list2.push(main.pop());
do{
list3.push(main.pop());
}while(main.length>0)

main.push(list2.pop());
do{
    list2.push(list3.pop());
}while(list3.length>0)

do{
    main.push(list2.pop());
}while(list2.length>0)
