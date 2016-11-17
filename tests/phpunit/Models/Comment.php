<?php
namespace Postmatic\Commentium\Unit_Tests\Models;

use Postmatic\Commentium\Models;
use WP_UnitTestCase;

class Comment extends WP_UnitTestCase {

	function test_get_missing_comment_iq_id() {
		$comment = new Models\Comment( static::factory()->comment->create() );
		$this->assertNull( $comment->get_comment_iq_comment_id(), 'Expected no comment IQ ID.' );
	}

	function test_set_comment_iq_id() {
		$comment = new Models\Comment( static::factory()->comment->create() );
		$comment->set_comment_iq_comment_id( 13 );
		$this->assertEquals( 13, $comment->get_comment_iq_comment_id(), 'Expected the comment IQ ID to be set.' );
	}

	function test_get_missing_comment_iq_data() {
		$comment = new Models\Comment( static::factory()->comment->create() );
		$this->assertEmpty( $comment->get_comment_iq_comment_details(), 'Expected no comment IQ details.' );
	}

	function test_set_comment_iq_details() {
		$comment = new Models\Comment( static::factory()->comment->create() );
		$data = array( 'Foo' => 'Bar' );
		$comment->set_comment_iq_comment_details( $data );
		$this->assertEqualSets( $data, $comment->get_comment_iq_comment_details(), 'Expected comment IQ data to be set.' );
	}
}
