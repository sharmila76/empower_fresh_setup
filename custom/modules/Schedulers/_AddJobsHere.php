<?php
				var_dump($job_strings);
				$job_strings[]='runProcessManager';
				var_dump($job_strings);
				function runProcessManager() {
				require_once('modules/PM_ProcessManager/ProcessManagerEngine.php');
				$processManager = new ProcessManagerEngine();
				$processManager->processManagerMain();
				return true;
				} 

				?>