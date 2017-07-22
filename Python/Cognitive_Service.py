import httplib, urllib, base64, json, quickstart, requests

# Replace the subscription_key string value with your valid subscription key.
subscription_key = 'bec9c58578e046ef8c57ecb2a8a1795d'

# Replace or verify the region.
#
# You must use the same region in your REST API call as you used to obtain your subscription keys.
# For example, if you obtained your subscription keys from the westus region, replace
# "westcentralus" in the URI below with "westus".
#
# NOTE: Free trial subscription keys are generated in the westcentralus region, so if you are using
# a free trial subscription key, you should not need to change this region.
uri_base = 'westcentralus.api.cognitive.microsoft.com'

headers = {
    # Request headers.
    'Content-Type': 'application/json',
    'Ocp-Apim-Subscription-Key': subscription_key,
}

params = urllib.urlencode({
    # Request parameters. The language setting "unk" means automatically detect the language.
    'language': 'unk',
    'detectOrientation ': 'true',
})

# body = "{'url':'/home/itsuncheng/Desktop/B0001_0004_018_001.jpg'}"
# The URL of a JPEG image containing text.
# body = "{'url':'https://www.dropbox.com/s/nsi86bxcpnq7fir/test123.jpg'}"
# body = "{'url':'https://photos-5.dropbox.com/t/2/AAAeFQP7oZE-rHFC3fb96uuZWZt1rArdGjr-y8HDs6zowA/12/687647208/jpeg/32x32/1/_/1/2/test123.jpg/EOrK6dIFGAMgBygH/rhhM8eEFhY15dVRinTTR6zbWIoLNkRJdZX5oSEfc9mU?size=1600x1200&size_mode=3'}"
# body = "{'url':'https://www.dropbox.com/home?preview=test123.jpg'}"
body = "{'url':'http://140.112.114.59/TaDELS/archiveImage/B_0001_0004_018/B0001_0004_018_001.jpg'}"

try:
    # DropboxAuth.setup()
    # Execute the REST API call and get the response.

    conn = httplib.HTTPSConnection('westcentralus.api.cognitive.microsoft.com')
    conn.request("POST", "/vision/v1.0/ocr?%s" % params, body, headers)
    response = conn.getresponse()
    data = response.read()

    # 'data' contains the JSON data. The following formats the JSON data for display.
    parsed = json.loads(data)
    print ("Response:")

    substring = [5, 3, 3, 0, 3, 0]
    index = 0
    rangeCount = 1

    for x in [7, 11, 14, 15, 16, 20]:
        result = ""
        for y in range(substring[index], len(parsed["regions"][0]["lines"][x]["words"])):
            # print(parsed["regions"][0]["lines"][x]["words"][y]["text"])
            result += parsed["regions"][0]["lines"][x]["words"][y]["text"]
        print(result)
        # values = {'values': result}
        # values = {'values': [['Hello Saturn', ], ]}
        values = {'values': [[result, ], ]}
        quickstart.add_todo(values, "B" + str(rangeCount))
        index += 1
        rangeCount += 1

    # print (json.dumps(parsed, sort_keys=True, indent=2))
    conn.close()

except Exception as e:
    print('Error:')
    print(e)
