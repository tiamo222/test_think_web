	 function edit_toolbar(page){
	 	try{ document.editForm.pageAction.value="modeAdd";}catch(err){}
		try{ document.editForm.mode.value="add";  }catch(err){}
		if(page != "" && page != "#") SubmitPage(page);
	}