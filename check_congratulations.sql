-- Check if there are any completed applications
SELECT app_id, student_id, app_status, congratulations_shown 
FROM application 
WHERE app_status = 'Completed';

-- Reset the congratulations_shown flag for testing (run this if you want to see the popup again)
UPDATE application 
SET congratulations_shown = 0 
WHERE app_status = 'Completed';
