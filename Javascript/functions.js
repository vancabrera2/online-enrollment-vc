/* Admin */ 
 
 function addstudent(){

  document.getElementById('edit-accountadmin').style.display= 'none' ;
   document.getElementById('reset-studentpass').style.display= 'none' ;
    document.getElementById('add-professor').style.display='none';
	 document.getElementById('add-subject').style.display='none';
  document.getElementById('add-student').style.display= 'block' ;
}

 function editing(){
  
  document.getElementById('add-student').style.display= 'none' ;
  document.getElementById('reset-studentpass').style.display= 'none' ;
   document.getElementById('add-professor').style.display='none';
    document.getElementById('add-subject').style.display='none';
  document.getElementById('edit-accountadmin').style.display= 'block' ;
}

 function reset(){
  
  document.getElementById('add-student').style.display= 'none' ;
  document.getElementById('edit-accountadmin').style.display= 'none' ;
  document.getElementById('add-subject').style.display='none';
     document.getElementById('add-professor').style.display='none';
  document.getElementById('reset-studentpass').style.display= 'block' ;
}

 function addsubject()
 {
  document.getElementById('add-student').style.display='none';
  document.getElementById('edit-accountadmin').style.display='none';
  document.getElementById('reset-studentpass').style.display='none';
     document.getElementById('add-professor').style.display='none';
  document.getElementById('add-subject').style.display='block';
 }
 
 function addprofessor()
 {
	document.getElementById('add-student').style.display='none';
  document.getElementById('edit-accountadmin').style.display='none';
  document.getElementById('add-subject').style.display='none';
  document.getElementById('add-professor').style.display='block';
 }
 
 function change()
 {
    document.getElementById('password1').disabled = false;
   document.getElementById('password2').disabled = false;
 }
 
 /* Professor */
  function search()
{
  document.getElementById('search-stud').style.display= 'block' ;	
  document.getElementById('give-grade').style.display= 'none' ;
  document.getElementById('edit-accountprof').style.display= 'none' ;
   
}

  function give()
 {
 document.getElementById('give-grade').style.display= 'block' ;
  document.getElementById('search-stud').style.display= 'none' ;
  document.getElementById('edit-accountprof').style.display= 'none' ;
}

  function edit()
  {
  document.getElementById('search-stud').style.display= 'none' ;
  document.getElementById('give-grade').style.display= 'none' ;
  document.getElementById('edit-accountprof').style.display= 'block' ;

}

/* Student new */

  function enroll()
{
document.getElementById('enroll-subject').style.display= 'block' ; 
  document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('view-grades').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;
}

  function editaccount_student()
 {
  document.getElementById('edit-account').style.display= 'block' ; 
  document.getElementById('view-grades').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;
   
}

  function viewgrades()
  {
document.getElementById('view-grades').style.display= 'block' ;
 document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;

}

  function viewschedule()
  {
  document.getElementById('view-schedule').style.display= 'block' ;
    document.getElementById('view-grades').style.display= 'none' ;
 document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;

}

/* Student Old */

  function enrollold()
{
document.getElementById('enroll-subject').style.display= 'block' ; 
  document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('view-gradesold').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;
}

  function editaccount_studentold()
 {
  document.getElementById('edit-account').style.display= 'block' ; 
  document.getElementById('view-gradesold').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;
   
}

  function viewgradesold()
  {
document.getElementById('view-gradesold').style.display= 'block' ;
 document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;
  document.getElementById('view-schedule').style.display= 'none' ;

}

  function viewscheduleold()
  {
  document.getElementById('view-schedule').style.display= 'block' ;
    document.getElementById('view-gradesold').style.display= 'none' ;
 document.getElementById('edit-account').style.display= 'none' ;
  document.getElementById('enroll-subject').style.display= 'none' ;

}