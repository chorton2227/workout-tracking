<?php

class ExercisesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('exercises')->delete();

		$routine_a_id = Routine::where('name', '=', 'Workout Routine A')->first()->id;
		$routine_b_id = Routine::where('name', '=', 'Workout Routine B')->first()->id;

		DB::table('exercises')->insert(array(
			array(
				'routine_id' => $routine_a_id,
				'name' => 'Exercise 1A',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_a_id,
				'name' => 'Exercise 2A',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_a_id,
				'name' => 'Exercise 3A',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_b_id,
				'name' => 'Exercise 1B',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_b_id,
				'name' => 'Exercise 2B',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
			array(
				'routine_id' => $routine_b_id,
				'name' => 'Exercise 2B',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'notes' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam orci nunc, consequat id sodales non, venenatis id nisi. Maecenas congue nec sem eu interdum. Nam vitae arcu id mi pellentesque convallis ut at quam. Aliquam vehicula, neque in malesuada rutrum, felis risus ornare libero, gravida lobortis velit lacus sit amet mi. Sed condimentum, odio vitae porta fringilla, arcu metus dapibus erat, et euismod velit tortor eget leo. Nulla et quam in mi fermentum gravida non sit amet leo. Aenean eu lacus in sem egestas elementum. Curabitur at dapibus urna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla vitae vestibulum lorem. Mauris ullamcorper nisl porta adipiscing elementum. Fusce fermentum, sapien non pharetra mollis, tellus mauris imperdiet est, at posuere ante sem quis tortor. Morbi et tempus ante. In a lectus lacus.',
				'created_at' => new DateTime,
				'updated_at' => new DateTime
			),
		));
	}

}