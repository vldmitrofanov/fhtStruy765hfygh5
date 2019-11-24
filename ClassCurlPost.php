<?php

// mutatis mutandis
namespace MyApp\Http;

class CurlPost
{
    private $url;
    private $options;

    /**
     * @param string $url     Request URL
     * @param array  $options cURL options
     */
    public function __construct($url, array $options = [])
    {
        $this->url = $url;
        $this->options = $options;
    }

    /**
     * Get the response
     * @return string
     * @throws \RuntimeException On cURL error
     */
    public function __invoke(array $data)
    {
        $ch = curl_init($this->url);
        $data_string = json_encode($data);
        if (_DEBUG_) {
            $verbose = fopen('php://temp', 'rw+');
        } else {
            $verbose = null;
        }


        foreach ($this->options as $key => $val) {
            curl_setopt($ch, $key, $val);
        }

        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        if (_DEBUG_) {
            curl_setopt($ch, CURLOPT_STDERR, $verbose);
        }
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                //'Content-Length: ' . strlen($data_string)
            )
        );

        $response = curl_exec($ch);
        $error    = curl_error($ch);
        $errno    = curl_errno($ch);
        if (_DEBUG_) {
            echo '<pre>';
            echo "Verbose information:\n", !rewind($verbose), stream_get_contents($verbose), "\n";
            echo '</pre>';
        }
        if (is_resource($ch)) {
            curl_close($ch);
        }

        if (0 !== $errno) {
            throw new \RuntimeException($error, $errno);
        }

        return $response;
    }
}
