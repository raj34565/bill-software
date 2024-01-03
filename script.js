/*function pattern1(num){
    for(let row=1;row<=num;row++){
        for(let col=1;col<=num;col++){
            process.stdout.write("* ");
        }
        console.log();
    }
}
pattern1(5);
function pattern2(num){
    for(let row=1;row<=num;row++){
        for(let col=1;col<=row;col++){
            process.stdout.write("* ");
        }
        console.log();
    }
}
pattern2(5);

function pattern3(num){
    for(let row=1;row<=num;row++){
        for(let col=5;col>=row;col--){
            process.stdout.write("* ");
        }
        console.log();
    }
}
pattern3(5);

function pattern5(num){
    for(let rows=1;rows<=num;rows++){
        let row='';
        for(let cols=1;cols<=num-rows+1;cols++){
            row+=cols+' ';
        }
        console.log(row);
    }
}

pattern5(5);


function pattern6(num){
    for(let row=1;row<=3;row++){
        for(let col=1;col<=3;col++){
            if(row==2 && col==2 ){
                process.stdout.write("O ");
            }
            else {
                process.stdout.write("X ")
            }
        }
        console.log();
    }
}
pattern6(3);

function pattern7(num){
    for(let row=0;row<=num;row++){
        for(let col=1;col<=num;col++){
            if((row==1 || row==2 ||row==3)&&(col==2 || col==3)){
                process.stdout.write("O ");
            }
            else {
                process.stdout.write("X ");
            }
        }
        console.log();
    }
}
pattern7(4);

function pattern8(N,M){
    for(let row=0;row<=N;row++){
        for(let col=1;col<M;col++){
            if((row==1 || row==5)&&(col==2 || col==3 || col==4 || col==5)){
                process.stdout.write("O ");
            }

            else if((row==2 || row==3 || row==4))
            {
                if(col==2 || col==5){
                    process.stdout.write("O ");
                }
                else{
                    process.stdout.write("X ");
                }
            }

            else{
                process.stdout.write("X ");
            }
        }
        console.log();
    }
}

pattern8(6,7);

function pattern9(n){
    for(let row=1;row<=2*n+1;row++){
        for(let col=1;col<=2*n+1;col++){
            if(row==1 || row==7)
            {
                if(col==1){process.stdout.write("P");}
                else if(col==7){process.stdout.write("M");}
                else{process.stdout.write("  ");}
            }
            if(row==2 || row==6){
                if(col==2){process.stdout.write("R");}
                else if(col==6){process.stdout.write("A");}
                else{process.stdout.write("  ");}
            }
            if(row==3 || row==5){
                if(col==3){process.stdout.write("O");}
                else if(col==5){process.stdout.write("R");}
                else{process.stdout.write("  ");}
            }
            if(row==4){
                if(col==4){process.stdout.write("G");}
                else{process.stdout.write("  ");}
            }
        }
        console.log();
    }
}

pattern9(3);

var patt=function (num){
    for(let row=1;row<=2*num;row++){
        for(let col=1; col<2*num;col++){
            if((row==2 || row==3 || row==4 ||row==5)&&(col==2 ||col==3 || col==4)){
                process.stdout.write("  ");
            }
            else{
                process.stdout.write("* ");
            }
        }
        console.log();
    }
}

patt(3);

var tri=function (num){
    for(let row=1;row<=2*num;row++){
        for(let col=1;col<=row;col++){
            while(col<2*num){
                process.stdout.write(" ");
                col++;
            }
            console.log(row);
        }
        console.log();
    }

}

tri(2);

function pattern13(n){
    for(let row=1;row<=2*n;row++){
        for(let space=row;space<=2*n;space++){
            process.stdout.write("  ");
        }
        for(let col=1;col<=row;col++){
            process.stdout.write(row+"   ");
        }
        console.log();
    }
}
pattern13(2);

function pattern14(n){
    for(let row=1;row<=2*n;row++){
        for(let col=1;col<=row;col++){
            process.stdout.write(row+" ");
        }
        console.log();
    }
}
pattern14(2);

function pattern15(n){
    for(let row=1;row<=2*n;row++){
        for(let col=1;col<=2*n-row;col++){
            process.stdout.write(col+" ");
        }
        console.log();
    }
}
pattern15(2);


function pattern20(num){
    var arr=['z','o','h','o','c','o','p'];
    for(let row=1;row<=num;row++){
        for(let col=0;col<3*num;col++){
            if(row>1 && col>4){
                console.log()
                process.stdout.write("   ");
            }
            else{
                process.stdout.write(arr[col]+"  ");
            }
        }
    }
}
pattern20(2);*/


