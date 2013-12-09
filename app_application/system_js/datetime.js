/////////////////////////////////////////////////////////// Start Lek
//คำนวณจำนวนวัน ของช่วงวัน  เช่น date1 = 08/07/2551 , date/2 = 07/08/2551
function dateDiff(date1,date2){
	var date_start = date1.split("/");
	var date_end = date2.split("/");
	if(date_start[1]<10){
		date_start[1] = date_start[1].substr(1,1);
	}
	if(date_start[0]<10){
		date_start[0] = date_start[0].substr(1,1);
	}
	if(date_end[1]<10){
		date_end[1] = date_end[1].substr(1,1);
	}
	if(date_end[0]<10){
		date_end[0] = date_end[0].substr(1,1);
	}
	date_start[2] = (date_start[2]-543);
	date_end[2] = (date_end[2]-543);

	var month=new Array(12);
	month[1]="Jan";
	month[2]="Feb";
	month[3]="Mar";
	month[4]="Apr";
	month[5]="May";
	month[6]="Jun";
	month[7]="Jul";
	month[8]="Aug";
	month[9]="Sep";
	month[10]="Oct";
	month[11]="Nov";
	month[12]="Dec";
	
	var month_start_en = month[date_start[1]];
	var month_end_en = month[date_end[1]];
	
	var total_start = month_start_en+" "+date_start[0]+","+date_start[2]; //Example : Jul 8,2005
	var total_end = month_end_en+" "+date_end[0]+","+date_end[2];
	
	var first_date = Date.parse(total_start);
	var last_date = Date.parse(total_end);
	var diff_date =  last_date - first_date;
	var num_days = (diff_date / (24 * 60 * 60 * 1000));
	result =Math.floor(num_days); //ปัดจุด
	return result;
}

function checkleapyear(datea)
{
	if(datea.getYear()%4 == 0)
	{
		if(datea.getYear()% 10 != 0)
		{
			return true;
		}
		else
		{
			if(datea.getYear()% 400 == 0)
				return true;
			else
				return false;
		}
	}
return false;
}
function DaysInMonth(Y, M) {
    with (new Date(Y, M, 1, 12)) {
        setDate(0);
        return getDate();
    }
}
function diffAge(date1, date2) {
    var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
	 y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();

    if (d1 < d2) {
        m1--;
        d1 += DaysInMonth(y2, m2);
    }
    if (m1 < m2) {
        y1--;
        m1 += 12;
    }
    return [y1 - y2, m1 - m2, d1 - d2];
}

function calAge(date1, date2){
			
	var date_start = date1.split("/");
	var date_end = date2.split("/");

	var calday = date_start[0];
	var calmon = date_start[1];
	var calyear = date_start[2]-543;

	var curday = date_end[0];
	var curmon = date_end[1];
	var curyear = date_end[2]-543;

	var curd = new Date(curyear,curmon-1, curday+1);
	var cald = new Date(calyear,calmon-1,calday);
	var diff =  Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
	
	var dife = diffAge(curd,cald);
	
//	alert(dife[0]+" years, "+dife[1]+" months, and "+dife[2]+" days");

	return [dife[0], dife[1], dife[2]];
}

function calBeginDate(date1, y, m, d){
			
	var date_end = date1.split("/");
	var curday = date_end[0]-d;
	var curmon = date_end[1]-m;
	var curyear = date_end[2]-543-y;
	var curd = new Date(curyear,curmon-1, curday+1);
	return padZero(curd.getDate())+"/"+padZero(curd.getMonth()+1)+"/"+(parseInt(curd.getYear())+543);
}

function calEndDate(date1, y, m, d){
			
	var date_start = date1.split("/");

	var curday = parseInt(date_start[0])+parseInt(d);
	var curmon = parseInt(date_start[1])+parseInt(m);
	var curyear = parseInt(date_start[2])-543+parseInt(y);
	var curd = new Date(curyear,curmon-1, curday-1);
	return padZero(curd.getDate())+"/"+padZero(curd.getMonth()+1)+"/"+(parseInt(curd.getYear())+543);
}

//หาว่าเหลืออีกกี่วันสิ้นเดือน เช่น date1 = 08/07/2551
function countRemainDate(date1){
	var data_split = date1.split("/");
	if(data_split[1]<10){
		data_split[1] = data_split[1].substr(1,1);
	}
	year = (data_split[1]-543);
	var monarr = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	// check for leap year
	if (((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0)) monarr[1] = "29";
	// display day left
	return (monarr[data_split[1]]-data_split[0]);
}
//หาเดือนภาษาไทย
function monthThai(num){
	var month = new Array();
	month[1]="ม.ค.";
	month[2]="ก.พ.";
	month[3]="มี.ค.";
	month[4]="เม.ย.";
	month[5]="พ.ค.";
	month[6]="มิ.ย.";
	month[7]="ก.ค.";
	month[8]="ส.ค.";
	month[9]="ก.ย.";
	month[10]="ต.ค.";
	month[11]="พ.ย.";
	month[12]="ธ.ค.";
	return month[num];
}

/////////////////////////////////////////////////////////// End Lek