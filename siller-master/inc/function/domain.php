<?php
use Iodev\Whois\Whois;
use Iodev\Whois\Exceptions\ConnectionException;
use Iodev\Whois\Exceptions\ServerMismatchException;
class domain {

	private $full_domain;

	private function domainCheck($domain) {
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_URL => 'https://www.thebluealliance.com/api/v3/team/frc'.$_SESSION['team_number'],
			CURLOPT_USERAGENT => 'Project Siller',
			CURLOPT_HTTPHEADER => array('X-TBA-Auth-Key: FP8EuLi1ASK3GKlXqHhUZFunb8CRJHP2ZRW6AVDyI2J5WyDeiVTw8MBR8SZhutHx')
		));
		$resp = curl_exec($curl);
		curl_close($curl);
		$resp = json_decode($resp, true);
		if(isset($resp['Errors'][0]['team_id'])) {
			// Team not found
			return false;
		} else {
			if(isset($resp['website'])) {
				$this->full_domain = $resp['website'];
				$frc_domain = str_replace('www.', '', parse_url($resp['website'])['host']);
				if($frc_domain === $domain) {
					return true;
				} else {
					return false;
				}
			} else {
				// No domain for team found
				return false;
			}
		}
	}

	public function dns($domain) {
		// Verify domain with Blue Alliance to team number
		if($this->domainCheck($domain)) {
			// Chcek for DNS code
			$result = dns_get_record($domain, DNS_TXT);
			if(!empty($result)) {
				// Records found, check TXT record
				foreach($result as $key => $data) {
					if($data['txt'] === 'siller-verification='.$_SESSION['domain_code']) {
						header('Content-Type: application/json');
						die(json_encode(array('Message' => 'Success')));
					} else {
						// Code is not correct
						header('Content-Type: application/json');
						die(json_encode(array('Message' => 'Fail')));
					}
				}
			} else {
				// No records found
				header('Content-Type: application/json');
				die(json_encode(array('Message' => 'Fail')));
			}
		} else {
			header('Content-Type: application/json');
			die(json_encode(array('Message' => 'Fail')));
		}
	}

	public function html($domain) {
		// Verify domain with Blue Alliance to team number
		if($this->domainCheck($domain)) {
			// Curl request to domain
			$opts = array(
				'http'=>array(
					'method'=>"GET",
					'header'=>"Content-Type: text/plain\r\n" . "Accept-language: en\r\n" . "User-Agent: Siller-Verification\r\n"
				)
			);
			$context = stream_context_create($opts);
			// The "@" will prevent error logs from being filled up
			$file = @file_get_contents($this->full_domain.'/siller-verification.html', false, $context);
			if($file !== FALSE) {
				if(trim($file) === "6bd8957c0531110c91098d8befe986ad") {
					header('Content-Type: application/json');
					die(json_encode(array('Message' => 'Success')));
				} else {
					header('Content-Type: application/json');
					die(json_encode(array('Message' => 'Fail')));
				}
			} else {
				header('Content-Type: application/json');
				die(json_encode(array('Message' => 'Fail')));
			}
		} else {
			header('Content-Type: application/json');
			die(json_encode(array('Message' => 'Fail')));
		}
	}

	public function whois($domain) {
		// Verify domain with Blue Alliance to team number
		if($this->domainCheck($domain)) {
			// Query whois for domain, whois server will automatically be changed per domain TLD
			$whois = Whois::create();
			try {
				$info = $whois->lookupDomain('siller.io');
				if (!$info) {
					echo "Null if domain available";
					exit;
				}
				echo $info->getText();
			} catch (ConnectionException $e) {
				echo "Disconnect or connection timeout";
			} catch (ServerMismatchException $e) {
				echo "Domain zone servers (.com for google.com) not found in current ServerProvider whois hosts";
			}
		} else {
			header('Content-Type: application/json');
			die(json_encode(array('Message' => 'Fail')));
		}
	}
}
?>
