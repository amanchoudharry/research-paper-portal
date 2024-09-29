<?php
include "common.php";
include "connect.php";

?>
<div class="mx-auto min-h-screen py-12">
	<div class="relative max-w-lg mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
		<div class="px-6">
			<div class="flex flex-wrap justify-center">
				<div class="w-full flex justify-center">
					<div class="relative">
						<?php
													if (isset($_SESSION['employee_id'])) {
														$employee_id = $_SESSION['employee_id'];
													
														$conn = new mysqli('localhost', 'root', '', 'scholarsphere');
													
														if ($conn->connect_error) {
															die("Connection failed: " . $conn->connect_error);
														}
													
														// Retrieve the user's avatar filename from the database
														$sql = "SELECT avatar_filename FROM registerinfo WHERE emp_id = $employee_id";
														$result = $conn->query($sql);
													
														if ($result && $result->num_rows > 0) {
															$row = $result->fetch_assoc();
															$avatar_filename = $row['avatar_filename'];
															echo '<img id="avatar" class="img-responsive shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px] " alt="User Avatar" src="uploads/' . $avatar_filename . '">';
														} else {
															// If no avatar found, display default avatar
															echo '<img id="avatar" class="img-responsive shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" alt="Default Avatar" src="assets\images\avatars\default-avatar.jpg">';
														}
													
														$conn->close();
													}
													?>
					</div>
				</div>
			</div>
			<div class=" mt-40">
				<div class="text-center mt-2">
					<h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1"><?php if(isset($_SESSION['user_name']) ) { echo $_SESSION['user_name']; } else{echo "Please login ";} ?></h3>
					<div class="text-lg mt-0 mb-2 text-slate-400 font-bold uppercase">
						<i class="fa-solid fa-id-badge mr-2 text-slate-400 opacity-75"></i><?php echo $_SESSION['employee_id']?>
					</div>
				</div>
				<div class="w-full text-center mt-2">
					<div class="flex justify-center lg:pt-4 pt-8 pb-0">
						<div class="p-3 text-center">
							<span class="text-xl font-medium block uppercase tracking-wide text-slate-700"><?php echo $_SESSION['department']?></span>
							<span class="text-sm text-slate-400">Department</span>
						</div>
						<div class="p-3 text-center">
							<span class="text-xl font-medium block uppercase tracking-wide text-slate-700"><?php echo $_SESSION['university']?></span>
							<span class="text-sm text-slate-400">University</span>
						</div>
					</div>
				</div>
        	</div>
		</div>

											<div class=" mx-auto max-w-sm grid rounded-2xl  justify-evenly bg-gray-50 dark:bg-gray-200 m-3 mt-10 grid-cols-2">
                                                <div class="col-span-1  p-3">
                                                    <div class="flex flex-col items-center ">
                                                        <a href=""> <button
                                                                class="tr-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-14 w-14 text-gray-500" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                                </svg>
                                                                <span class="text-lg font-medium">Edit Profile</span>
                                                            </button></a>
                                                    </div>
                                                </div>
                                                <div class="col-span-1 bg-red-50 p-3 rounded-e-2xl">
                                                    <div class="flex  flex-col items-center ">
                                                        <a href="logout.php"> <button class="tr-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-14 w-14 text-gray-500" fill="none"
                                                                    viewBox="0 0 24 24" stroke="currentColor"
                                                                    stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                                                </svg>
                                                                <span class="text-lg font-medium">Logout</span>
                                                            </button></a>
                                                    </div>
                                                </div>
                                            </div>

		<div class="relative h-6 overflow-hidden rounded-b-xl mt-5">
            <div class="absolute flex -space-x-12 rounded-b-2xl">
                <div class="w-44 h-8 transition-colors duration-200 delay-75 transform skew-x-[35deg] bg-amber-400/90 group-hover:bg-amber-600/90 z-10"></div>
                <div class="w-44 h-8 transition-colors duration-200 delay-100 transform skew-x-[35deg] bg-amber-300/90 group-hover:bg-amber-500/90 z-20"></div>
                <div class="w-44 h-8 transition-colors duration-200 delay-150 transform skew-x-[35deg] bg-amber-200/90 group-hover:bg-amber-400/90 z-30"></div>
                <div class="w-44 h-8 transition-colors duration-200 delay-200 transform skew-x-[35deg] bg-amber-100/90 group-hover:bg-amber-300/90 z-40"></div>
                <div class="w-44 h-8 transition-colors duration-200 delay-300 transform skew-x-[35deg] bg-amber-50/90 group-hover:bg-amber-200/90 z-50"></div>
            </div>
        </div>
	</div>
</div>
<?php
include "footer.php"
?>
