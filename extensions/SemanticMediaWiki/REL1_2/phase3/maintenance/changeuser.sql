set @oldname = 'At18'; 
set @newname = 'Alfio';

update low_priority user set user_name=@newname where user_name=@oldname;
update low_priority user_newtalk set user_ip=@newname where user_ip=@oldname;
update low_priority cur set cur_user_text=@newname where cur_user_text=@oldname;
update low_priority old set old_user_text=@newname where old_user_text=@oldname;
update low_priority archive set ar_user_text=@newname where ar_user_text=@oldname;
update low_priority ipblocks set ipb_address=@newname where ipb_address=@oldname;
update low_priority oldimage set oi_user_text=@newname where oi_user_text=@oldname;
update low_priority recentchanges set rc_user_text=@newname where rc_user_text=@oldname;

